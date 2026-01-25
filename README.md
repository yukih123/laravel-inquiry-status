# Inquiry Status API

Laravel + Docker で構築した API プロジェクトです。  
問い合わせステータス管理用のバックエンドとして利用する想定です。

---

## 概要

- お問い合わせの送信・管理を想定したシンプルな構成
- Laravel + MySQL + Nginx を Docker で構築
- 環境構築手順を最小化し、再現性を重視

---

## 技術スタック

- PHP 8.x
- Laravel 10.x
- MySQL 8.0
- Nginx
- Docker / Docker Compose

---

## 必要なもの

- Docker
- Docker Compose

---

## セットアップ

```bash
git clone git@github.com:yukih123/laravel-inquiry-status.git
cd YOUR_REPO
cp .env.example .env
docker compose up -d --build
```

---

## 初期設定（初回のみ）

```bash
docker compose exec app bash
composer install
php artisan key:generate
php artisan migrate
```

---

## アクセス

http://localhost:8080

---

## ブランチ運用

- main: 本番用
- feature/*: 開発用
