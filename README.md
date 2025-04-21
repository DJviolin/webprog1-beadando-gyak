# webprog1_beadando_gyak

## Használat

Windows-on a [Docker Compose](https://docs.docker.com/compose/) projekt futtatásáhához [Docker Desktop](https://docs.docker.com/desktop/setup/install/windows-install/) és [WSL2](https://learn.microsoft.com/en-us/windows/wsl/install)-re van szükség.

**Környezeti változó fájl létrehozása:**

```sh
# Windows
$ copy .env.example .env
# Linux/MacOS
$ cp .env.example .env
```

**Compose projekt futtatása:**

```sh
$ docker compose up -d
```

**Compose projekt leállítása:**

```sh
$ docker compose down
```
