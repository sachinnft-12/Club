# Production-Ready Local LLM Chatbot (Python + FastAPI + LangGraph)

This service provides a full backend chatbot stack using only Python and a **local LLM** through Ollama.

## Features
- FastAPI API server (`POST /chat`)
- LangGraph workflow + memory (`thread_id` per session)
- Multi-turn conversations
- Optional SQLAlchemy-backed read-only database tool for FAQ lookups
- Logging, startup database initialization, and error handling
- Local model support (`llama3.1`, `mistral`, etc.)

## Project Layout

```text
ai_chatbot/
├── app/
│   ├── api/
│   │   └── routes.py
│   ├── core/
│   │   ├── config.py
│   │   └── logging.py
│   ├── graph/
│   │   └── workflow.py
│   ├── models/
│   │   └── schemas.py
│   ├── services/
│   │   └── database.py
│   └── main.py
├── tests/
│   └── test_chat_api.py
├── .env.example
└── requirements.txt
```

## Setup

1. Install dependencies:
   ```bash
   cd ai_chatbot
   python -m venv .venv
   source .venv/bin/activate
   pip install -r requirements.txt
   ```

2. Start Ollama and pull a model:
   ```bash
   ollama serve
   ollama pull llama3.1:8b
   ```

3. Configure environment:
   ```bash
   cp .env.example .env
   ```

4. Run API server:
   ```bash
   uvicorn app.main:app --reload --host 0.0.0.0 --port 8000
   ```

## API Contract

### POST `/chat`
Request:
```json
{
  "message": "What can you do?"
}
```

Optional multi-session request:
```json
{
  "session_id": "user-123",
  "message": "Remember my preference for dark mode"
}
```

Response:
```json
{
  "reply": "I can help answer questions, retrieve FAQ information, and continue context in this session."
}
```

## LangGraph Memory
- `ChatbotGraphService.chat()` passes `thread_id=session_id` to LangGraph checkpointer.
- `MemorySaver` stores conversation state for each session.

## Optional Database Query Tool
- The graph can call `query_faq_database` tool.
- Tool supports only `SELECT` statements for safety.
- Seed FAQs are created at startup.

## Test
```bash
pytest -q
```
