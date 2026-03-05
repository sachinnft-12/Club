from typing import Any, Dict

from langchain_core.messages import HumanMessage
from langchain_core.tools import tool
from langchain_ollama import ChatOllama
from langgraph.checkpoint.memory import MemorySaver
from langgraph.prebuilt import create_react_agent

from app.core.config import get_settings
from app.services.database import run_read_only_query

settings = get_settings()


@tool
def query_faq_database(sql_query: str) -> str:
    """Run a read-only SQL SELECT query on the local FAQ database for factual lookups."""
    return run_read_only_query(sql_query)


def build_graph():
    llm = ChatOllama(
        model=settings.ollama_model,
        base_url=settings.ollama_base_url,
        temperature=settings.llm_temperature,
    )

    tools = [query_faq_database] if settings.enable_db_tool else []
    memory = MemorySaver()

    system_prompt = (
        "You are a production website assistant. "
        "Provide concise and accurate answers, reason step-by-step internally, "
        "and use tools only when needed for factual database checks."
    )

    return create_react_agent(
        model=llm,
        tools=tools,
        checkpointer=memory,
        state_modifier=system_prompt,
    )


class ChatbotGraphService:
    def __init__(self) -> None:
        self.graph = build_graph()

    def chat(self, session_id: str, message: str) -> str:
        config: Dict[str, Any] = {"configurable": {"thread_id": session_id}}
        result = self.graph.invoke({"messages": [HumanMessage(content=message)]}, config=config)
        return result["messages"][-1].content
