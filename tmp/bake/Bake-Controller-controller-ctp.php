<?php
/**
 * Controller bake template file
 *
 * Allows templating of Controllers generated from bake.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;
?>
<CakePHPBakeOpenTagphp
namespace <?= $namespace ?>\Controller<?= $prefix ?>;

use <?= $namespace ?>\Controller\AppController;

/**
 * <?= $name ?> Controller
 *
<?php if ($defaultModel): ?>
 * @property \<?= $defaultModel ?> $<?= $name ?>

<?php endif; ?>
<?php
foreach ($components as $component):
    $classInfo = $this->Bake->classInfo($component, 'Controller/Component', 'Component');
?>
 * @property <?= $classInfo['fqn'] ?> $<?= $classInfo['name'] ?>

<?php endforeach; ?>
<?php if (in_array('index', $actions)): ?>
 *
 * @method \<?= $namespace ?>\Model\Entity\<?= $entityClassName ?>[] paginate($object = null, array $settings = [])
<?php endif; ?>
 */
class <?= $name ?>Controller extends AppController
{
<?php
echo $this->Bake->arrayProperty('helpers', $helpers, ['indent' => false]);
echo $this->Bake->arrayProperty('components', $components, ['indent' => false]);
foreach($actions as $action) {
    echo $this->element('Controller/' . $action);
}
?>
}
