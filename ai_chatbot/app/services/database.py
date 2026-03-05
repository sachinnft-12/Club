from contextlib import contextmanager
from typing import Generator

from sqlalchemy import Column, Integer, String, Text, create_engine, text
from sqlalchemy.orm import Session, declarative_base, sessionmaker

from app.core.config import get_settings

settings = get_settings()
engine = create_engine(settings.sqlalchemy_database_uri, future=True)
SessionLocal = sessionmaker(bind=engine, autoflush=False, autocommit=False, expire_on_commit=False)
Base = declarative_base()


class FAQ(Base):
    __tablename__ = "faq"

    id = Column(Integer, primary_key=True)
    question = Column(String(255), nullable=False)
    answer = Column(Text, nullable=False)


def init_db() -> None:
    Base.metadata.create_all(bind=engine)
    with SessionLocal() as session:
        existing = session.query(FAQ).count()
        if existing == 0:
            session.add_all(
                [
                    FAQ(question="What are your support hours?", answer="Support is available 24/7 by email."),
                    FAQ(question="How do I reset my password?", answer="Use the 'Forgot Password' option on the sign-in page."),
                ]
            )
            session.commit()


@contextmanager
def get_db() -> Generator[Session, None, None]:
    db = SessionLocal()
    try:
        yield db
    finally:
        db.close()


def run_read_only_query(sql_query: str) -> str:
    cleaned = sql_query.strip().lower()
    if not cleaned.startswith("select"):
        return "Only read-only SELECT queries are allowed."

    with SessionLocal() as session:
        result = session.execute(text(sql_query))
        rows = result.fetchall()
        if not rows:
            return "No rows returned."
        return "\n".join(str(dict(row._mapping)) for row in rows)
