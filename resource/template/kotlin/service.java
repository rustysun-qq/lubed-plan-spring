package <?php echo $model->getNamespace();?>.services;

import ${package.Entity}.${entity};
import import <?php echo $model->getBaseNamespace();?>;

/**
 * <p>
 * $!{table.comment} 服务类
 * </p>
 *
 * @author ${author}
 * @since ${date}
 */

interface <?php echo $model->getClassName();?> : <?php echo $model->getBaseClass();?> <${entity}>
