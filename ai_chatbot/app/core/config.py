from functools import lru_cache

from pydantic import Field
from pydantic_settings import BaseSettings, SettingsConfigDict


class Settings(BaseSettings):
    model_config = SettingsConfigDict(env_file=".env", env_file_encoding="utf-8", case_sensitive=False)

    app_name: str = Field(default="Local AI Chatbot", alias="APP_NAME")
    app_env: str = Field(default="development", alias="APP_ENV")
    app_host: str = Field(default="0.0.0.0", alias="APP_HOST")
    app_port: int = Field(default=8000, alias="APP_PORT")
    log_level: str = Field(default="INFO", alias="LOG_LEVEL")

    ollama_base_url: str = Field(default="http://localhost:11434", alias="OLLAMA_BASE_URL")
    ollama_model: str = Field(default="llama3.1:8b", alias="OLLAMA_MODEL")
    llm_temperature: float = Field(default=0.2, alias="LLM_TEMPERATURE")

    sqlalchemy_database_uri: str = Field(default="sqlite:///./chatbot.db", alias="SQLALCHEMY_DATABASE_URI")
    enable_db_tool: bool = Field(default=True, alias="ENABLE_DB_TOOL")


@lru_cache
def get_settings() -> Settings:
    return Settings()
