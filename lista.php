<?php
    class Lista{
        public function addLista($descricao,$email){
            try{
                $sql = "INSERT INTO lista VALUES ?, ?, ?";
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(1, '0');
                $stmt->bindValue(2, $descricao);
                $stmt->bindValue(3, $email);

                $stmt->execute();

                return true;
            }catch(Exception e){
                return false;
            }
        }

        public function removeLista($codlista){
            try{
                $sql = "DELETE * FROM lista WHERE codlista = ?;
                        DELETE * FROM listaItem WHERE codlista = ?";
                $stmt->Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(1,2, $codlista);
            }catch(Exception e){
                return false;
            }
        }

        public function addItem($coditem,$codlista){
            try{
                $sql = "INSERT INTO ItemLista VALUES ?, ?";
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(2, $codItem);
                $stmt->bindValue(3, $CodLista);

                $stmt->execute();

                return true;
            }catch(Exception e){
                return false;
            }
        }

        public function removeItem($coditem,$codlista){
            try{
                $sql = "DELETE FROM ItemLista WHERE coditem = ? AND codLista = ?";
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(2, $codItem);
                $stmt->bindValue(3, $CodLista);
                
                $stmt->execute();

                return true;
            }catch(Exception e){
                return false;
            }
        }
    }
?>
