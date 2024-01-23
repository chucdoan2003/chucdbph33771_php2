<?php
class InvoiceModel extends Database{
    public $table='invoice';
    public function insertInvoice($id_user, $id_cart ){
        $conn=$this->getConnect();
        $sql="INSERT INTO $this->table(id_user, id_cart) VALUES(?, ?)";
        $stmt=$conn->prepare($sql);
        $stmt->execute([ $id_user,$id_cart]);
        $lastID=$conn->lastInsertId();
        return $lastID;
    }
    public function insertDetailInvoice($id_invoice, $id_sp,$quantity, $total ){
        $sql ="INSERT INTO invoice_detail(id_invoice, id_sp, quantity, total) VALUES($id_invoice, $id_sp,$quantity, $total)";
        $this->getData($sql, false);
    }
    public function getInvoice($id_user){
        $sql="SELECT invoice.id,invoice.status, users.username, product.name,product.price,
        invoice_detail.quantity, invoice_detail.total
        FROM invoice_detail JOIN invoice ON invoice_detail.id_invoice = invoice.id
        JOIN product ON invoice_detail.id_sp= product.id
        JOIN users ON invoice.id_user=users.id WHERE invoice.id_user=$id_user";
        return $this->getData($sql, true);
    }
    public function changeInvoice($change,$id){
        $sql ="UPDATE $this->table SET status=$change where id= $id";
        $this->getData($sql, false);
    }
}