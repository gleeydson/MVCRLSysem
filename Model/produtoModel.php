<?php

class ProdutoModel
{

    public function insert(produtoVo $value)
    {
        $prod = new  produtoDAO();
        if ($value->getPreco() == "0") {
            $value->setPreco(10.90);
        }
        return $prod->insert($value);

    }

    public function delete(produtoVo $value)
    {
        $prod = new  produtoDAO();

        return $prod->update($value);

    }

    public function update(produtoVo $value)
    {
        $prod = new  produtoDAO();

        return $prod->insert($value);

    }

    public function getById($id)
    {
        $prod = new  produtoDAO();
        $vo = $prod->getById($id);

        //regra de negócio
        $value->setPreco("R$ ".number_format($vo->getPreco(), 2, ',', '.'));

        return $vo;

    }

}