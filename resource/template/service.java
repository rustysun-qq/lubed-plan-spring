package <?php echo $model->getNamespace('.services');?>.services;

import ${package.Entity}.${entity};
import <?php echo $model->getBaseNamespace();?>;

/**
 * <p>
 * $!{table.comment} 服务类
 * </p>
 *
 * @author ${author}
 * @since ${date}
 */

public interface <?php echo $model->getClassName();?>extends <?php echo $model->getBaseClass();?><${entity}> {

}
