# Egg Timer (Wasmer-ready)

## Run locally (needs PHP installed)
```bash
php -S 127.0.0.1:8000 -t app
```
Open: http://127.0.0.1:8000

## Deploy on Wasmer (via website or GitHub)
- Upload this repository / zip to Wasmer
- Wasmer will use `app.yaml` + `wasmer.toml` to run:
  `php -S 0.0.0.0:$PORT -t /app`
