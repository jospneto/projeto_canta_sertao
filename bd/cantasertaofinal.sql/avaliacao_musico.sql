CREATE TABLE avaliacao_musico (
    
    `id` int NOT NULL AUTO_INCREMENT,
	`cpf_cnpj` bigint(20) NOT NULL,
	`nome` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `estrelas` int NOT NULL,
    `comentario` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`cpf_cnpj`) REFERENCES `user_musico`(`cpf_cnpj`)
    
);