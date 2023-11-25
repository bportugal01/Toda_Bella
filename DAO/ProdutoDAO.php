<?php
include_once 'conexao/conexao.php';

class ProdutoDAO
{
    public static function cadastrarProduto($codigoProduto, $nomeProduto, $situacao, $precoUnitario, $quantidadeEstoque)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "INSERT INTO Produto (CodigoProduto, NomeProduto, SituacaoProduto, PrecoUnitario, QuantidadeEstoque)
                    VALUES (:codigoProduto, :nomeProduto, :situacao, :precoUnitario, :quantidadeEstoque)";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':codigoProduto', $codigoProduto);
            $stmt->bindParam(':nomeProduto', $nomeProduto);
            $stmt->bindParam(':situacao', $situacao);
            $stmt->bindParam(':precoUnitario', $precoUnitario);
            $stmt->bindParam(':quantidadeEstoque', $quantidadeEstoque);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar produto: " . $e->getMessage();
            return false;
        }
    }

    public static function listarProdutos()
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT * FROM Produto";
            $stmt = $conexao->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar produtos: " . $e->getMessage();
            return [];
        }
    }

    public static function excluirProduto($codigoProduto)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "DELETE FROM Produto WHERE CodigoProduto = :codigoProduto";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':codigoProduto', $codigoProduto);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir produto: " . $e->getMessage();
            return false;
        }
    }

    public static function listarProdutosNaoVendidos()
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT Produto.NomeProduto, Produto.CodigoProduto, Produto.PrecoUnitario, Produto.QuantidadeEstoque 	, Produto.SituacaoProduto 	
            FROM Produto
            LEFT JOIN ItemNotaFiscal ON Produto.CodigoProduto = ItemNotaFiscal.CodigoProduto
            WHERE ItemNotaFiscal.CodigoProduto IS NULL";
            $stmt = $conexao->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar produtos não vendidos: " . $e->getMessage();
            return [];
        }
    }

    public static function listarVendedoresPorNomeProduto($nomeProduto)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT Vendedor.NomeVendedor, Produto.NomeProduto
                FROM Produto
                JOIN ItemNotaFiscal ON Produto.CodigoProduto = ItemNotaFiscal.CodigoProduto
                JOIN NotaFiscal ON ItemNotaFiscal.CodigoNotaFiscal = NotaFiscal.CodigoNotaFiscal
                JOIN Vendedor ON NotaFiscal.CodigoVendedor = Vendedor.CodigoVendedor
                WHERE Produto.NomeProduto = :nomeProduto
                GROUP BY Vendedor.NomeVendedor
                ORDER BY Vendedor.NomeVendedor";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':nomeProduto', $nomeProduto);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar vendedores por produto: " . $e->getMessage();
            return [];
        }
    }

}
?>