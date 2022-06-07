<?php
    Class Usuario{
        public function cadastraUsuario($nome,$email,$endereco,$numero,$complemento){
            try{
                $sql = "INSERT INTO usuario VALUES (? ,?, ?, ?, ?, ?)";
                $stmt = Conexao::getConexao()->prepare($sql);

                $stmt->bindValue(1, '0');
                $stmt->bindValue(2, $nome);
                $stmt->bindValue(3, $email);
                $stmt->bindValue(4, $endereco);
                $stmt->bindValue(5, $numero);
                $stmt->bindValue(6, $complemento);

                $stmt->execute();
                return 'Usuario cadastrado com sucesso!';
            }catch(Exception e){
                return false;
            }
        }

        public function excluiUsuario($email){
            try{

                $sql = "DELETE * FROM usuario WHERE codusuario = ?; DELETE * FROM lista WHERE codLista = ?; DELETE * FROM usuario  ";
                $stmt = Conexao::getConexao()->prepare($sql);

                $stmt->bindValue(1, '0');

                $stmt->execute();
                return true;
                return true;
            }catch(Exception e){
                return false;
            }
        }

        public function getUsuarioEmail($email){
            try{
                $sql = "SELECT * FROM usuario WHERE email = ?";
                $stmt = Conexao::getConexao()->prepare($sql);

                $stmt->bindValue(1, $email);

                $stmt->execute();

                $result = fetchAll(PDO::FETCH_BOTH);

                return $result;
            }catch(Exception e){
                return false;
            }
        }
    }
?>