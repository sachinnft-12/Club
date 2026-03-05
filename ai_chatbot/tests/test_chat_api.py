from fastapi.testclient import TestClient

from app.main import app


client = TestClient(app)


def test_chat_endpoint(monkeypatch):
    from app.api import routes

    monkeypatch.setattr(routes.chat_service, "chat", lambda session_id, message: f"echo:{session_id}:{message}")

    response = client.post("/chat", json={"message": "hello", "session_id": "abc"})

    assert response.status_code == 200
    assert response.json() == {"reply": "echo:abc:hello"}


def test_health_endpoint():
    response = client.get("/health")
    assert response.status_code == 200
    assert response.json()["status"] == "ok"
