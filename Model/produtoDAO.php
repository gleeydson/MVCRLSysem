<?php

class produtoDAO
{


    public function insert(produtoVo $value)
    {
        $sql = "INSERT INTO produtos (nome, marca, preco) VALUES (";
        $sql .= "?,?,?)";
        $DB = new DB;

        $DB->getConnection();
        $pstm = $DB->execSQL($sql);
        $pstm->bind_param("s", $value->getNome());
        $pstm->bind_param("s", $value->getMarca());
        $pstm->bind_param("s", $value->getPreco());

        if ($pstm->execute())
            return true;
        else
            return false;

    }

    public function update(produtoVo $value)
    {
        $sql = "UPDATE produtos SET nome = ?, marca = ?, preco = ? WHERE id = ?";

        $DB = new DB;
        $DB->getConnection();
        $pstm = $DB->execSQL($sql);
        $pstm->bind_param("s", $value->getNome());
        $pstm->bind_param("s", $value->getMarca());
        $pstm->bind_param("s", $value->getPreco());
        $pstm->bind_param("i", $value->getId());

        if ($pstm->execute())
            return true;
        else
            return false;

    }

    public function delete(produtoVo $value)
    {
        $sql = "DELETE FROM produtos WHERE id = ?";

        $DB = new DB;
        $DB->getConnection();
        $pstm = $DB->execSQL($sql);

        $pstm->bind_param("s", $value->getNome());
        $pstm->bind_param("s", $value->getMarca());
        $pstm->bind_param("s", $value->getPreco());
        $pstm->bind_param("i", $value->getId());

        if ($pstm->execute())
            return true;
        else
            return false;

    }

    public function getById($id)
    {
        $sql = "SELECT * FROM produtos WHERE id = " . addslashes($id);

        $DB = new DB;
        $DB->getConnection();
        $query = $DB->execReader($sql);

        $vo = new produtoVo();

        while ($reg = $query->fetch_array(mysqli_assoc)) {
            $vo->setId($reg["id"]);
            $vo->setnome($reg["nome"]);
            $vo->setmarca($reg["marca"]);
            $vo->setpreco($reg["preco"]);
        }

        return $vo;
    }


}