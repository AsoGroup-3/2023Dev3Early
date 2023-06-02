-- スレッド
CREATE TABLE threads(
    thread_id    INT(16)      AUTO_INCREMENT NOT NULL,
    thread_name  VARCHAR(512)                NOT NULL,
    thread_bytes INT(16)                     NOT NULL,
    PRIMARY KEY(thread_id));

-- ユーザー
CREATE TABLE users(
    user_id     VARCHAR(64)         NOT NULL,
    user_name   VARCHAR(64) NOT NULL,
    create_date DATE        NOT NULL,
    PRIMARY KEY(user_id));

-- スレッドコメント
CREATE TABLE thread_comments(
    thread_comment_id INT           NOT NULL,
    comment           VARCHAR(1024) NOT NULL,
    create_at         DATE          NOT NULL,
    user_id           VARCHAR(64)   NOT NULL,
    thread_id         INT           NOT NULL,
    PRIMARY KEY(thread_comment_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (thread_id) REFERENCES threads(thread_id));

