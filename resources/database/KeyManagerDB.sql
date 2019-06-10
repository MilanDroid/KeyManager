--BASE TABLE FOR USER'S DATA
DROP TABLE users;
CREATE TABLE users
(
    id serial NOT NULL,
    email character varying(60) NOT NULL,
    username character varying(10) NOT NULL,
    names character varying(30) NOT NULL,
    last_names character varying(30) NOT NULL,
    status boolean NOT NULL DEFAULT false,
    creation date NOT NULL,
    inhabilitation date,
    password character varying(255) NOT NULL,
    PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE users OWNER to postgres;

--TABLE WHERE ALL THE PAGE PERMISSONS ARE SAVED
DROP TABLE users_permissions;

CREATE TABLE users_permissions
(
    user_id integer NOT NULL,
    page_id integer NOT NULL,
    level integer NOT NULL,
    PRIMARY KEY (user_id, page_id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE users_permissons OWNER to postgres;

--