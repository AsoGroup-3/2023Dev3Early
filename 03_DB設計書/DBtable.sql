CREATE TABLE threads(
    thread_id          INT          NOT NULL AUTO_INCREMENT,
    thread_name        VARCHAR(512) NOT NULL,
    thread_detail      VARCHAR(512) NOT NULL,
    thread_bytes       INT ,
    thread_create_date DATETIME     NOT NULL,
    PRIMARY KEY (thread_id)
);

CREATE TABLE users(
    user_id          VARCHAR(128) NOT NULL,
    user_name        VARCHAR(64)  NULL,
    user_create_date DATETIME     NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE thread_comments(
    thread_comment_id INT           NOT NULL AUTO_INCREMENT,
    comments          VARCHAR(1024) NOT NULL,
    create_at         DATETIME      NOT NULL,
    user_id           VARCHAR(128)  NOT NULL,
    user_name         VARCHAR(64)   NULL,
    thread_id         INT           NOT NULL,
    PRIMARY KEY (thread_comment_id),
    FOREIGN KEY (thread_id) REFERENCES threads(thread_id)
);

CREATE TABLE rings (
    ring_id         INT           NOT NULL AUTO_INCREMENT,
    ring_name       VARCHAR(255)  NOT NULL,
    ring_detail     VARCHAR(255)  NOT NULL,
    create_user     VARCHAR(128)  NOT NULL,
    invitation_user VARCHAR(128)  NOT NULL,
    res_num         INT           NOT NULL,
    create_date     DATETIME      NOT NULL,
    thread_id       INT           NOT NULL,
    PRIMARY KEY (ring_id) ,
    FOREIGN KEY (create_user) REFERENCES users(user_id),
    FOREIGN KEY (invitation_user) REFERENCES users(user_id),
    FOREIGN KEY (thread_id) REFERENCES threads(thread_id)
);

CREATE TABLE ring_comments(
    ring_comment_id INT          NOT NULL AUTO_INCREMENT,
    ring_comment    VARCHAR(512) NOT NULL,
    create_date     DATETIME     NOT NULL,
    user_id         VARCHAR(128) NOT NULL,
    ring_id         INT          NOT NULL,
    PRIMARY KEY (ring_comment_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (ring_id) REFERENCES rings(ring_id)
);