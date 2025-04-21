# webprog1_beadando_gyak

## Használat

Fejlesztői környezetben a projekt futtatásához [Docker Engine](https://docs.docker.com/engine/install/) és [Docker Compose](https://docs.docker.com/compose/)-ra van szükséges.

Windows-on [Docker Desktop](https://docs.docker.com/desktop/setup/install/windows-install/) és [WSL2](https://learn.microsoft.com/en-us/windows/wsl/install)-re van szükség.

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
