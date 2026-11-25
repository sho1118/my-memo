# Keepsake

作品や旅行の感想を、見た直後の熱量のまま残せる記録アプリ。
PHPとMySQLで開発中。

## データベースの作り方

データベース名：`keepsake`（phpMyAdminで先に作る）

### 1. 最初のテーブル

```sql
CREATE TABLE records (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  note TEXT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

### 2. 種類・体験日・評価の列を追加

```sql
ALTER TABLE records
  ADD COLUMN category VARCHAR(20) NOT NULL DEFAULT 'その他' AFTER title,
  ADD COLUMN experienced_on DATE NULL AFTER category,
  ADD COLUMN rating TINYINT NULL AFTER experienced_on;
```