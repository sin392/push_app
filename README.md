# push_app

## 初期設定

### サーバ(コンテナ)の立ち上げ

```shell
docker-compose up
```

### コンテナへのログイン

※コンテナ内であれば PHP や artisan も利用可能です。

```shell
docker-compose exec web bash
```

### フロント側のリソースの自動コンパイル(開発時)

```shell
npm run watch
```

## デプロイ
