package <?php echo $model->getNamespace();?>.controllers;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
<?php if($model->getBaseNamespace()):?>
import <?php echo $model->getBaseNamespace();?>;
<?php endif;?>

/**
 * <p>
 * $!{table.comment} 前端控制器
 * </p>
 *
 * @author ${author}
 * @since ${date}
 */
@RestController
@RequestMapping("<?php echo $model->getRequestPath();?>")
<?php if($model->getBaseClass()):?>
public class <?php echo $model->getClassName();?> extends <?php echo $model->getBaseClass();?> {
<?php else:?>
public class <?php echo $model->getClassName();?> {
<?php endif;?>
//TODO:
}
