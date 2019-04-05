<?php
class Product
{
    //Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 6;

    /**
     * Выводит список всех товаров
    */
    public static function index()
    {
        $stmt = Connection::query("SELECT * FROM products ORDER BY id ASC");
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Получаем последние товары
     *
     * @param int $page
     * @return array
     */
    public static function getLatestProducts($page = 1)
    {
        $limit = self::SHOW_BY_DEFAULT;

        //Задаем смещение
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);

        $sql = "SELECT id, name, price, is_new, description
                  FROM products
                    WHERE status = 1
                      ORDER BY id DESC
                        LIMIT :limit OFFSET :offset
                ";

        //Подготавливаем данные
        $stmt = Connection::query($sql);
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        //Выполняем запрос
        $stmt->execute();
        //Получаем и возвращаем результат
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    /**
     * Добавление продукта
     *
     * @param $options - характеристики товара
     * @return int|string
     */
    public static function store($options)
    {
        $sql = "INSERT INTO products(
                name,category_id, price, brand,
                description, is_new, status)
                VALUES (:name, :category_id, :price,
                :brand, :description, :is_new, :status)";
        
        $stmt = Connection::prepare($sql);

        $stmt->bindParam(':name', $options['name'], PDO::PARAM_STR);
        
        $stmt->bindParam(':category_id', $options['category'], PDO::PARAM_INT);
        $stmt->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $stmt->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $stmt->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $stmt->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $stmt->execute();
        
    }

    public static function lastId() 
    {
        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);
        $stmt = Connection::prepare("SELECT id FROM products ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }

    /**
     * Общее кол-во товаров в магазине
     *
     * @return mixed
     */
    public static function getTotalProducts()
    {
        // Текст запроса к БД
        $sql = "SELECT count(id) AS count FROM products WHERE status=1 ";
        // Выполнение коменды
        $stmt = Connection::query($sql);

        // Возвращаем значение count - количество
        $row = $stmt->fetch();
        return $row['count'];
    }
   
}