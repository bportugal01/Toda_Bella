-- Cria��o do banco de dados profissional de beleza:
CREATE DATABASE BdBeleza;  -- Cria o banco de dados chamado "BdBeleza".

-- Usar o banco de dados criado:
USE BdBeleza;  -- Define o banco de dados como ativo para uso.

/* Criar Tabelas: */

-- Tabela Produto:
CREATE TABLE Produto (
    CodigoProduto INT NOT NULL IDENTITY(1,1),  -- ID autom�tico do produto.
    NomeProduto VARCHAR(60),  -- Nome do produto.
    SituacaoProduto VARCHAR(7) CHECK (SituacaoProduto IN ('Ativo', 'Inativo')),  -- Situa��o do produto.
    PrecoUnitario DECIMAL(10, 2),  -- Pre�o unit�rio do produto.
    QuantidadeEstoque INT,  -- Quantidade em estoque do produto.

    PRIMARY KEY (CodigoProduto)  -- Chave prim�ria da tabela.
);

-- Tabela Cliente:
CREATE TABLE Cliente (
    CodigoCliente INT NOT NULL IDENTITY(1,1),  -- ID autom�tico do cliente.
    NomeCliente VARCHAR(50),  -- Nome do cliente.
    RGCliente VARCHAR(20),  -- N�mero de RG do cliente.
    CPFCliente VARCHAR(20),  -- N�mero de CPF do cliente.
    EnderecoCliente VARCHAR(50),  -- Endere�o do cliente.

    PRIMARY KEY (CodigoCliente)  -- Chave prim�ria da tabela.
);

CREATE TABLE Telefone (
    CodigoTelefone INT NOT NULL IDENTITY(1,1),  -- ID autom�tico do telefone.
    CodigoCliente INT NOT NULL,  -- Chave estrangeira para associar o telefone ao cliente.
    NumeroTelefone VARCHAR(15),  -- N�mero de telefone.

    PRIMARY KEY (CodigoTelefone),  -- Chave prim�ria da tabela.
    FOREIGN KEY (CodigoCliente) REFERENCES Cliente (CodigoCliente)  -- Chave estrangeira para o cliente.
);

CREATE TABLE TipoTelefone (
    CodigoTelefone INT NOT NULL,  -- Chave estrangeira para associar o tipo de telefone ao telefone.
    DescricaoTipo VARCHAR(20),  -- Descri��o do tipo de telefone.

    FOREIGN KEY (CodigoTelefone) REFERENCES Telefone (CodigoTelefone)  -- Chave estrangeira para o telefone.
);

-- Tabela Ve�culo:
CREATE TABLE Veiculo (
    CodigoVeiculo INT NOT NULL IDENTITY(1,1),  -- ID autom�tico do ve�culo.
    PlacaVeiculo VARCHAR(7),  -- Placa do ve�culo.
    TipoVeiculo VARCHAR(50),  -- Tipo do ve�culo.
    ModeloVeiculo VARCHAR(50),  -- Modelo do ve�culo.

    PRIMARY KEY (CodigoVeiculo)  -- Chave prim�ria da tabela.
);

-- Tabela Regi�o:
CREATE TABLE Regiao (
    CodigoRegiao INT NOT NULL IDENTITY(1,1),  -- ID autom�tico da regi�o.
    NomeRegiao VARCHAR(30),  -- Nome da regi�o.

    PRIMARY KEY (CodigoRegiao)  -- Chave prim�ria da tabela.
);

-- Tabela Vendedor:
CREATE TABLE Vendedor (
    CodigoVendedor INT NOT NULL IDENTITY(1,1),  -- ID autom�tico do vendedor.
    CodigoRegiao INT NOT NULL,  -- Chave estrangeira para associar o vendedor a uma regi�o.
    NomeVendedor VARCHAR(50),  -- Nome do vendedor.
    RGVendedor VARCHAR(20),  -- N�mero de RG do vendedor.
    DataNascimento DATE,  -- Data de nascimento do vendedor.
    TelefoneVendedor VARCHAR(15),  -- N�mero de telefone do vendedor.

    PRIMARY KEY (CodigoVendedor),  -- Chave prim�ria da tabela.
    FOREIGN KEY (CodigoRegiao) REFERENCES Regiao (CodigoRegiao)  -- Chave estrangeira para a regi�o.
);

-- Tabela Ponto Estrat�gico:
CREATE TABLE PontoEstrategico (
    CodigoPonto INT NOT NULL IDENTITY(1,1),  -- ID autom�tico do ponto estrat�gico.
    CodigoRegiao INT NOT NULL,  -- Chave estrangeira para associar o ponto a uma regi�o.
    NomePonto VARCHAR(100),  -- Nome do ponto estrat�gico.

    PRIMARY KEY (CodigoPonto),  -- Chave prim�ria da tabela.
    FOREIGN KEY (CodigoRegiao) REFERENCES Regiao (CodigoRegiao)  -- Chave estrangeira para a regi�o.
);

-- Tabela Utiliza��o do Ve�culo:
CREATE TABLE UtilizacaoVeiculo (
    CodigoVeiculo INT NOT NULL,  -- Chave estrangeira para associar o ve�culo.
    CodigoVendedor INT NOT NULL,  -- Chave estrangeira para associar o vendedor.
    DataUtilizacao DATE,  -- Data de utiliza��o do ve�culo.

    FOREIGN KEY (CodigoVeiculo) REFERENCES Veiculo (CodigoVeiculo),  -- Chave estrangeira para o ve�culo.
    FOREIGN KEY (CodigoVendedor) REFERENCES Vendedor (CodigoVendedor)  -- Chave estrangeira para o vendedor.
);

-- Tabela Nota Fiscal:
CREATE TABLE NotaFiscal (
    CodigoNotaFiscal INT NOT NULL IDENTITY(1,1),  -- ID autom�tico da nota fiscal.
    NumeroNotaFiscal INT NOT NULL,  -- N�mero da nota fiscal.
    CodigoCliente INT NOT NULL,  -- Chave estrangeira para associar o cliente � nota fiscal.
    CodigoVendedor INT NOT NULL,  -- Chave estrangeira para associar o vendedor � nota fiscal.
    DataEmissao DATE,  -- Data de emiss�o da nota fiscal.

    PRIMARY KEY (CodigoNotaFiscal),  -- Chave prim�ria da tabela.
    FOREIGN KEY (CodigoCliente) REFERENCES Cliente (CodigoCliente),  -- Chave estrangeira para o cliente.
    FOREIGN KEY (CodigoVendedor) REFERENCES Vendedor (CodigoVendedor)  -- Chave estrangeira para o vendedor.
);

-- Tabela Item da Nota Fiscal:
CREATE TABLE ItemNotaFiscal (
    NumeroItemNotaFiscal INT NOT NULL IDENTITY(1,1),  -- ID autom�tico do item da nota fiscal.
    CodigoProduto INT NOT NULL,  -- Chave estrangeira para associar o produto ao item.
    CodigoNotaFiscal INT NOT NULL,  -- Chave estrangeira para associar a nota fiscal ao item.
    QuantidadeProduto INT NOT NULL,  -- Quantidade do produto na nota fiscal.

    PRIMARY KEY (NumeroItemNotaFiscal),  -- Chave prim�ria da tabela.
    FOREIGN KEY (CodigoNotaFiscal) REFERENCES NotaFiscal (CodigoNotaFiscal),  -- Chave estrangeira para a nota fiscal.
    FOREIGN KEY (CodigoProduto) REFERENCES Produto (CodigoProduto)  -- Chave estrangeira para o produto.
);


-- Inser��o de dados na tabela Produto:

INSERT INTO Produto (NomeProduto, SituacaoProduto, PrecoUnitario, QuantidadeEstoque)
VALUES 
('Sabonete'			  , 'Ativo'	,	2.99	, 200),
('Creme Facial'		  , 'Ativo'	,	15.50	, 5  ),
('Esmalte'			  , 'Ativo'	,	5.99	, 150),
('Secador de Cabelo'  , 'Ativo'	,	49.99	, 30 ),
('Pincel de Maquiagem', 'Ativo'	,	7.99	, 100),
('Protetor Solar'      , 'Inativo', 12.99, 80),
('Batom'               , 'Ativo', 9.50, 60),
('Shampoo'             , 'Inativo', 8.99, 90),
('Condicionador'       , 'Ativo', 8.99, 80),
('M�scara de C�lios'   , 'Inativo', 6.50, 70);


-- Inser��o de dados na tabela Cliente:
INSERT INTO Cliente (NomeCliente, RGCliente, CPFCliente, EnderecoCliente)
VALUES 
('Pedro Santos'  , '7654321', '123456789', 'Rua C, 789'),
('Ana Pereira'	 , '9871234', '234567890', 'Av. D, 987'),
('Jos� Silva'	 , '5432198', '890123456', 'Rua E, 456'),
('Marta Oliveira', '3217890', '567890123', 'Av. F, 654'),
('Luiz Fernandes', '8765432', '678901234', 'Rua G, 321');

-- Inser��o de dados na tabela Telefone:
INSERT INTO Telefone (CodigoCliente, NumeroTelefone)
VALUES 
(3, '555-2468'),
(4, '555-7890'),
(5, '555-9876'),
(1, '555-1111'),
(2, '555-2222');

-- Inser��o de dados na tabela TipoTelefone:
INSERT INTO TipoTelefone (CodigoTelefone, DescricaoTipo)
VALUES 
(3, 'Comercial'	      ),
(4, 'Celular Trabalho'),
(5, 'Recado'		  ),
(1, 'Celular Pessoal' ),
(2, 'Residencial'     );

-- Inser��o de dados na tabela Veiculo:
INSERT INTO Veiculo (PlacaVeiculo, TipoVeiculo, ModeloVeiculo)
VALUES 
('DEF456', 'Carro', 'SUV'      ),
('UVW123', 'Moto' , 'Custom'   ),
('GHI789', 'Carro', 'Hatchback'),
('JKL012', 'Moto' , 'Touring'  ),
('MNO345', 'Carro', 'Sedan'    );

-- Inser��o de dados na tabela Regiao:
INSERT INTO Regiao (NomeRegiao)
VALUES 
('Oeste'   ),
('Leste'   ),
('Centro'  ),
('Noroeste'),
('Sudoeste');

-- Inser��o de dados na tabela Ponto Estrat�gico com os principais locais de cada regi�o (adicionais):
INSERT INTO PontoEstrategico (CodigoRegiao, NomePonto)
VALUES
(3, 'Avenida Paulista, Museu de Arte de S�o Paulo (MASP), Parque Trianon, Shopping Paulista'),
(4, 'Parque Ibirapuera, Museu de Arte Moderna de S�o Paulo (MAM), Jardim Bot�nico'),
(5, 'P�tio do Col�gio, Catedral da S�, Mercado Municipal de S�o Paulo'),
(1, 'Parque Villa-Lobos, Shopping Villa-Lobos, Est�dio Allianz Parque'),
(2, 'Parque Burle Marx, Pra�a Panamericana, Jockey Club de S�o Paulo'),
(3, 'Parque da Independ�ncia, Museu do Ipiranga, Sesc Ipiranga'),
(4, 'Parque Villa-Lobos, Tomie Ohtake Cultural Institute, Shopping Eldorado'),
(5, 'Bairro da Liberdade, Teatro Municipal de S�o Paulo, Pinacoteca do Estado'),
(1, 'Parque do Povo, Shopping Iguatemi, Cidade Jardim'),
(2, 'Parque do Povo, Parque Alfredo Volpi, Shopping Cidade Jardim'),
(5, 'Parque do Carmo, Shopping Aricanduva, Sesc Itaquera');

-- Inser��o de dados na tabela Vendedor:
INSERT INTO Vendedor (CodigoRegiao, NomeVendedor, RGVendedor, DataNascimento, TelefoneVendedor)
VALUES 
(3, 'Rita Soares'   , '6543210', '1988-04-30', '555-3333'),
(4, 'Paulo Martins' , '4321098', '1992-07-12', '555-4444'),
(5, 'Isabel Lima'   , '2109876', '1995-10-15', '555-5555'),
(1, 'Fernando Costa', '7890123', '1980-02-25', '555-6666'),
(2, 'L�cia Santos'  , '0987654', '1987-11-05', '555-7777');



-- Inser��o de dados na tabela UtilizacaoVeiculo:
INSERT INTO UtilizacaoVeiculo (CodigoVeiculo, CodigoVendedor, DataUtilizacao)
VALUES
(3, 3, '2023-10-27'),
(4, 4, '2023-10-28'),
(5, 5, '2023-10-29'),
(1, 1, '2023-10-30'),
(2, 2, '2023-10-31');

-- Inser��o de dados na tabela Nota Fiscal:
INSERT INTO NotaFiscal (NumeroNotaFiscal, CodigoCliente, CodigoVendedor, DataEmissao)
VALUES 
(1003, 3, 3, '2023-10-27'),
(1004, 3, 4, '2023-10-28'),
(1005, 5, 5, '2023-10-29'),
(1006, 1, 1, '2023-10-30'),
(1007, 2, 2, '2023-10-31'),
(1008, 2, 3, '2023-11-1'),
(1009, 1, 3, '2023-11-2');

-- Inser��o de dados na tabela Item da Nota Fiscal:
INSERT INTO ItemNotaFiscal (CodigoProduto, CodigoNotaFiscal, QuantidadeProduto)
VALUES 
(3, 1, 4),
(4, 2, 1),
(5, 3, 2),
(1, 4, 5),
(2,5, 3),
(6,6, 2);


-----------------------------------------------------------------------------------------
-- Listar todos os pontos estrat�gicos de cada regi�o com seus respectivos nomes.
-- Esta consulta combina informa��es das tabelas Regiao e PontoEstrategico,
-- exibindo os nomes das regi�es e seus pontos estrat�gicos correspondentes.

SELECT Regiao.NomeRegiao, PontoEstrategico.NomePonto
FROM Regiao
INNER JOIN PontoEstrategico
ON Regiao.CodigoRegiao = PontoEstrategico.CodigoRegiao;
-----------------------------------------------------------------------------------------

-----------------------------------------------------------------------------------------
-- Exibir os nomes das regi�es cadastradas.
-- Essa consulta simples retorna os nomes das regi�es presentes na tabela Regiao.

SELECT NomeRegiao FROM Regiao;
-----------------------------------------------------------------------------------------


-----------------------------------------------------------------------------------------
-- Mostrar todos os vendedores e os ve�culos que eles utilizaram no �ltimo m�s.
-- Esta query lista os vendedores, os ve�culos que utilizaram no �ltimo m�s
-- e as respectivas datas de utiliza��o, ordenados pelo nome do vendedor.

SELECT Vendedor.NomeVendedor, Veiculo.PlacaVeiculo, UtilizacaoVeiculo.DataUtilizacao
FROM Vendedor
INNER JOIN UtilizacaoVeiculo 
ON Vendedor.CodigoVendedor = UtilizacaoVeiculo.CodigoVeiculo
INNER JOIN Veiculo
ON UtilizacaoVeiculo.CodigoVeiculo = Veiculo.CodigoVeiculo
WHERE UtilizacaoVeiculo.DataUtilizacao <= DATEADD(MONTH, 0, GETDATE())
ORDER BY Vendedor.NomeVendedor;
-----------------------------------------------------------------------------------------

-----------------------------------------------------------------------------------------
-- Apresentar os vendedores respons�veis por cada regi�o, ordenados por c�digo de regi�o.
-- Esta consulta exibe os nomes dos vendedores e as regi�es que s�o respons�veis,
-- ordenados pelo c�digo da regi�o.

SELECT Regiao.NomeRegiao, Vendedor.NomeVendedor
FROM Regiao
INNER JOIN Vendedor 
ON Regiao.CodigoRegiao = Vendedor.CodigoRegiao
ORDER BY Regiao.CodigoRegiao;
-----------------------------------------------------------------------------------------

-----------------------------------------------------------------------------------------
-- Listar todos os produtos que ainda n�o foram vendidos.
-- Retorna os nomes dos produtos que ainda n�o foram registrados em nenhuma nota fiscal.

SELECT NomeProduto 
FROM Produto
WHERE CodigoProduto NOT IN (SELECT CodigoProduto FROM ItemNotaFiscal)
ORDER BY NomeProduto;
-----------------------------------------------------------------------------------------


-----------------------------------------------------------------------------------------
-- Mostrar todos os produtos vendidos por Rita Soares.
-- Esta consulta exibe os nomes dos produtos que foram vendidos pela vendedora 'Rita Soares'.

SELECT DISTINCT Produto.NomeProduto
FROM Produto
INNER JOIN ItemNotaFiscal 
ON Produto.CodigoProduto = ItemNotaFiscal.CodigoProduto
INNER JOIN NotaFiscal 
ON ItemNotaFiscal.CodigoNotaFiscal = NotaFiscal.CodigoNotaFiscal
INNER JOIN Vendedor ON NotaFiscal.CodigoVendedor = Vendedor.CodigoVendedor
WHERE Vendedor.NomeVendedor = 'Rita Soares';
-----------------------------------------------------------------------------------------


-----------------------------------------------------------------------------------------
-- Exibir todos os vendedores que venderam o produto "Sabonete".
-- Retorna os nomes dos vendedores que venderam o produto espec�fico 'Sabonete'.

SELECT DISTINCT Vendedor.NomeVendedor
FROM Vendedor 
INNER JOIN NotaFiscal 
ON Vendedor.CodigoVendedor = NotaFiscal.CodigoVendedor
INNER JOIN ItemNotaFiscal 
ON NotaFiscal.CodigoNotaFiscal = ItemNotaFiscal.CodigoNotaFiscal
INNER JOIN Produto 
ON ItemNotaFiscal.CodigoProduto = Produto.CodigoProduto
WHERE Produto.NomeProduto = 'Sabonete';
-----------------------------------------------------------------------------------------

-----------------------------------------------------------------------------------------
-- Mostrar o hist�rico de utiliza��o do ve�culo com a placa "JKL012".
-- Retorna informa��es sobre a utiliza��o do ve�culo com a placa 'JKL012',
-- incluindo o modelo do ve�culo, o nome do vendedor e a data de utiliza��o.

SELECT Veiculo.PlacaVeiculo, Veiculo.ModeloVeiculo, Vendedor.NomeVendedor, UtilizacaoVeiculo.DataUtilizacao
FROM Vendedor
INNER JOIN UtilizacaoVeiculo 
ON Vendedor.CodigoVendedor = UtilizacaoVeiculo.CodigoVendedor
INNER JOIN Veiculo ON UtilizacaoVeiculo.CodigoVeiculo = Veiculo.CodigoVeiculo
WHERE Veiculo.PlacaVeiculo = 'JKL012';
-----------------------------------------------------------------------------------------

-----------------------------------------------------------------------------------------
-- Listar a quantidade de itens de cada nota fiscal.
-- Esta consulta retorna o c�digo da nota fiscal e a quantidade de itens associados a cada uma.

SELECT CodigoNotaFiscal, COUNT(*) AS QuantidadeItens
FROM ItemNotaFiscal
GROUP BY CodigoNotaFiscal;
-----------------------------------------------------------------------------------------