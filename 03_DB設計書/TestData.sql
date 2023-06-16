INSERT INTO threads VALUES(null,"test_thread_1",null),
                          (null,"test_thread_2",null),
                          (null,"test_thread_3",null);

INSERT INTO users VALUES("test_user_1","テストユーザー１","2023-06-16 10:52:34"),
                        ("test_user_2","テストユーザー２","2023-07-16 10:54:34"),
                        ("test_user_3","テストユーザー３","2023-08-16 10:46:11");

INSERT INTO thread_comments VALUES(null,"コメントテスト１","2023-06-16 10:52:34","test_thread_1",1),
                                  (null,"コメントテスト２","2023-06-16 10:52:34","test_thread_2",1),
                                  (null,"コメントテスト３","2023-06-16 10:52:34","test_thread_3",1),
                                  (null,"コメントテスト１","2023-06-16 10:52:34","test_thread_1",2),
                                  (null,"コメントテスト２","2023-06-16 10:52:34","test_thread_2",2),
                                  (null,"コメントテスト３","2023-06-16 10:52:34","test_thread_3",2),
                                  (null,"コメントテスト１","2023-06-16 10:52:34","test_thread_1",3),
                                  (null,"コメントテスト２","2023-06-16 10:52:34","test_thread_2",3),
                                  (null,"コメントテスト３","2023-06-16 10:52:34","test_thread_3",3);

INSERT INTO rings VALUES(null,"test_user_1","test_user_2",1),
                        (null,"test_user_2","test_user_3",2),
                        (null,"test_user_3","test_user_1",3);

INSERT INTO ring_comments VALUES(null,"コメントテスト１","2023-06-16 10:52:34","test_thread_1",1),
                                (null,"コメントテスト２","2023-06-16 10:52:34","test_thread_2",1),
                                (null,"コメントテスト３","2023-06-16 10:52:34","test_thread_3",1),
                                (null,"コメントテスト１","2023-06-16 10:52:34","test_thread_1",2),
                                (null,"コメントテスト２","2023-06-16 10:52:34","test_thread_2",2),
                                (null,"コメントテスト３","2023-06-16 10:52:34","test_thread_3",2),
                                (null,"コメントテスト１","2023-06-16 10:52:34","test_thread_1",3),
                                (null,"コメントテスト２","2023-06-16 10:52:34","test_thread_2",3),
                                (null,"コメントテスト３","2023-06-16 10:52:34","test_thread_3",3);