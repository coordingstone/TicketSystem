<?php
/**
 * Created by PhpStorm.
 * User: joelsvensson
 * Date: 2018-10-28
 * Time: 14:01
 */

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class AbstractBaseMigration extends AbstractMigration
{

    protected function addSqlFromFile($filePath) {
        $sql = file_get_contents($filePath);
        if ($sql === false) {
            throw new \Exception("Failed to read sql from file path '$filePath'");
        }

        $sqlComments = '@(([\'"]).*?[^\\\]\2)|((?:\#|--).*?$|/\*(?:[^/*]|/(?!\*)|\*(?!/)|(?R))*\*\/)\s*|(?<=;)\s+@ms';
        $uncommentedSQL = trim( preg_replace( $sqlComments, '$1', $sql ) );

        $queries = preg_split('/;/', $uncommentedSQL);

        foreach ($queries as $key => $query) {
            if (empty($query)) {
                unset($queries[$key]);
            }
        }

        if (empty($queries)) {
            throw new \Exception("No queries found in '$filePath'");
        }
        $this->addSql($queries);
    }
    
    public function up(Schema $schema)
    {
        // TODO: Implement up() method.
    }

    public function down(Schema $schema)
    {
        // TODO: Implement down() method.
    }
}