from fastapi import APIRouter, HTTPException

from app.core.logging import logger
from app.graph.workflow import ChatbotGraphService
from app.models.schemas import ChatRequest, ChatResponse

router = APIRouter()
chat_service = ChatbotGraphService()


@router.post("/chat", response_model=ChatResponse)
def chat(request: ChatRequest) -> ChatResponse:
    try:
        reply = chat_service.chat(session_id=request.session_id, message=request.message)
        return ChatResponse(reply=reply)
    except Exception as exc:  # noqa: BLE001
        logger.exception("Chat request failed: %s", exc)
        raise HTTPException(status_code=500, detail="Chat processing failed") from exc
