-- ユーザテーブル
create table user_info(
    user_id int AUTO_INCREMENT,
    mail_address varchar(50) not null,
    password varchar(255) not null,
    user_name varchar(10) not null,
    primary key (user_id)
);

-- 問題情報テーブル
create table question_info(
    question_id int auto_increment,
    user_id int not null,
    title varchar(50) not null,
    content varchar(255) not null,
    answer varchar(255) not null,
    img_path varchar(255) not null,
    primary key (question_id),
    foreign key (user_id) references user_info (user_id)
);

-- ヒント情報テーブル
create table hint_info(
    hint_id int not null,
    question_id int not null,
    hint_content varchar(255),
    primary key (hint_id),
    foreign key (question_id) references question_info (question_id)
);