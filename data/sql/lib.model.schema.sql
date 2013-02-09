
-----------------------------------------------------------------------------
-- actividad
-----------------------------------------------------------------------------

DROP TABLE "actividad" CASCADE;


CREATE TABLE "actividad"
(
	"id" serial  NOT NULL,
	"nombre_actividad" VARCHAR(255),
	"ponente" VARCHAR(255),
	"turno" BOOLEAN,
	"ejecutada" BOOLEAN,
	"cantidad_participantes_m" INTEGER,
	"cantidad_participantes_f" INTEGER,
	"alcanzo_tiempo" BOOLEAN,
	"causas_incumplimiento" VARCHAR(255),
	"id_municipio" INTEGER,
	"escuela" BOOLEAN,
	"refugio" BOOLEAN,
	"observaciones" VARCHAR(255),
	"id_sala" INTEGER,
	"id_tipo_actividad" INTEGER,
	"fecha_hora" TIMESTAMP,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "actividad" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- encuesta
-----------------------------------------------------------------------------

DROP TABLE "encuesta" CASCADE;


CREATE TABLE "encuesta"
(
	"id" serial  NOT NULL,
	"nombre_encuesta" VARCHAR(255),
	"descripcion_encuesta" VARCHAR(255),
	"tipo_encuesta" VARCHAR(255),
	"fecha_elaboracion" TIMESTAMP default now(),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "encuesta" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- informe
-----------------------------------------------------------------------------

DROP TABLE "informe" CASCADE;


CREATE TABLE "informe"
(
	"id" serial  NOT NULL,
	"titulo_informe" VARCHAR(255),
	"fecha_informe" TIMESTAMP,
	"creado_por" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "informe" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- item
-----------------------------------------------------------------------------

DROP TABLE "item" CASCADE;


CREATE TABLE "item"
(
	"id" serial  NOT NULL,
	"texto" VARCHAR(255),
	"id_encuesta" INTEGER,
	"seleccion_simple" BOOLEAN default 't',
	"identificador_item" INTEGER,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "item" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- municipio
-----------------------------------------------------------------------------

DROP TABLE "municipio" CASCADE;


CREATE TABLE "municipio"
(
	"id" serial  NOT NULL,
	"municipio" VARCHAR(255),
	"estado" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "municipio" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- opcion_respuesta
-----------------------------------------------------------------------------

DROP TABLE "opcion_respuesta" CASCADE;


CREATE TABLE "opcion_respuesta"
(
	"id" serial  NOT NULL,
	"id_item" INTEGER,
	"respuesta" VARCHAR(255),
	"seleccion_simple" BOOLEAN default 't',
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "opcion_respuesta" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- pagina
-----------------------------------------------------------------------------

DROP TABLE "pagina" CASCADE;


CREATE TABLE "pagina"
(
	"id" serial  NOT NULL,
	"id_informe" INTEGER,
	"titulo_informe" VARCHAR(255),
	"ante_cuadro" VARCHAR(255),
	"titulo_cuadro" VARCHAR(255),
	"post_cuadro" VARCHAR(255),
	"texto_posterior" VARCHAR(255),
	"ante_grafico" VARCHAR(255),
	"post_grafico" VARCHAR(255),
	"tipo_grafico" INTEGER,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "pagina" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- respuesta_encuesta_expositor
-----------------------------------------------------------------------------

DROP TABLE "respuesta_encuesta_expositor" CASCADE;


CREATE TABLE "respuesta_encuesta_expositor"
(
	"id" serial  NOT NULL,
	"id_item" INTEGER,
	"respuesta" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "respuesta_encuesta_expositor" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- respuesta_encuesta_visitante
-----------------------------------------------------------------------------

DROP TABLE "respuesta_encuesta_visitante" CASCADE;


CREATE TABLE "respuesta_encuesta_visitante"
(
	"id" serial  NOT NULL,
	"id_item" INTEGER,
	"respuesta" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "respuesta_encuesta_visitante" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- sala
-----------------------------------------------------------------------------

DROP TABLE "sala" CASCADE;


CREATE TABLE "sala"
(
	"id" serial  NOT NULL,
	"nombre_sala" VARCHAR(255),
	"descripcion_sala" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "sala" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- sf_guard_user_profile
-----------------------------------------------------------------------------

DROP TABLE "sf_guard_user_profile" CASCADE;


CREATE TABLE "sf_guard_user_profile"
(
	"id" serial  NOT NULL,
	"user_id" INTEGER  NOT NULL,
	"first_name" VARCHAR(20),
	"last_name" VARCHAR(20),
	"birthday" DATE,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "sf_guard_user_profile" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tipo_actividad
-----------------------------------------------------------------------------

DROP TABLE "tipo_actividad" CASCADE;


CREATE TABLE "tipo_actividad"
(
	"id" serial  NOT NULL,
	"nombre_tipo" VARCHAR(255),
	"descripcion_tipo" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "tipo_actividad" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- valor_opcion
-----------------------------------------------------------------------------

DROP TABLE "valor_opcion" CASCADE;


CREATE TABLE "valor_opcion"
(
	"id" serial  NOT NULL,
	"id_opcion" INTEGER,
	"valor" VARCHAR(255),
	"id_opcion_respuesta" INTEGER,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "valor_opcion" IS '';


SET search_path TO public;
ALTER TABLE "actividad" ADD CONSTRAINT "actividad_FK_1" FOREIGN KEY ("id_sala") REFERENCES "sala" ("id") ON UPDATE CASCADE;

ALTER TABLE "actividad" ADD CONSTRAINT "actividad_FK_2" FOREIGN KEY ("id_tipo_actividad") REFERENCES "tipo_actividad" ("id") ON UPDATE CASCADE;

ALTER TABLE "item" ADD CONSTRAINT "item_FK_1" FOREIGN KEY ("id_encuesta") REFERENCES "encuesta" ("id") ON UPDATE CASCADE;

ALTER TABLE "opcion_respuesta" ADD CONSTRAINT "opcion_respuesta_FK_1" FOREIGN KEY ("id_item") REFERENCES "item" ("id") ON UPDATE CASCADE;

ALTER TABLE "pagina" ADD CONSTRAINT "pagina_FK_1" FOREIGN KEY ("id_informe") REFERENCES "informe" ("id") ON UPDATE CASCADE;

ALTER TABLE "respuesta_encuesta_expositor" ADD CONSTRAINT "respuesta_encuesta_exposito_FK_1" FOREIGN KEY ("id_item") REFERENCES "item" ("id") ON UPDATE CASCADE;

ALTER TABLE "respuesta_encuesta_visitante" ADD CONSTRAINT "respuesta_encuesta_visitant_FK_1" FOREIGN KEY ("id_item") REFERENCES "item" ("id") ON UPDATE CASCADE;

ALTER TABLE "sf_guard_user_profile" ADD CONSTRAINT "sf_guard_user_profile_FK_1" FOREIGN KEY ("user_id") REFERENCES "sf_guard_user" ("id") ON DELETE CASCADE;

ALTER TABLE "valor_opcion" ADD CONSTRAINT "valor_opcion_FK_1" FOREIGN KEY ("id_opcion_respuesta") REFERENCES "opcion_respuesta" ("id") ON UPDATE CASCADE;
