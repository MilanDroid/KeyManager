--BASE TABLE FOR USER'S DATA
DROP TABLE users;
CREATE TABLE users
(
    id serial NOT NULL,
    email character varying(60) NOT NULL,
    username character varying(10) NOT NULL,
    names character varying(30) NOT NULL,
    last_names character varying(30) NOT NULL,
    user_type integer NOT NULL DEFAULT 1,
    status boolean NOT NULL DEFAULT false,
    creation date NOT NULL,
    inhabilitation date,
    password character varying(255) NOT NULL,
    PRIMARY KEY (id)
);

ALTER TABLE users OWNER to postgres;

--TABLE WHERE ALL THE PAGE PERMISSONS ARE SAVED
DROP TABLE users_permissions;

CREATE TABLE users_permissions
(
    user_id integer NOT NULL,
    page_id integer NOT NULL,
    permission_type character varying(15) NOT NULL,
    level integer NOT NULL,
    asignation_date date NOT NULL,
    PRIMARY KEY (user_id, page_id, permission_type)
);

ALTER TABLE users_permissions OWNER to postgres;

--TABLE WHERE ALL THE PAGES ARE SAVED
DROP TABLE pages;

CREATE TABLE pages
(
    page_id serial,
    name character varying(30) NOT NULL,
    creation date NOT NULL,
    PRIMARY KEY (page_id)
);

ALTER TABLE pages OWNER to postgres;

--TABLE WHERE ALL THE PAGES-GROUPS ARE SAVED
DROP TABLE pages_groups;

CREATE TABLE pages_groups
(
    group_id serial,
    source_group integer,
    page_id integer NOT NULL,
    name character varying(30) NOT NULL,
    creation date NOT NULL,
    PRIMARY KEY (group_id)
);

ALTER TABLE pages_groups OWNER to postgres;

--TABLE WHERE ALL THE USER-TYPES ARE SAVED
DROP TABLE users_types;

CREATE TABLE users_types
(
    type_id serial,
    name character varying(30) NOT NULL,
    creation date NOT NULL,
    PRIMARY KEY (type_id)
);

ALTER TABLE users_types OWNER to postgres;