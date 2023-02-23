package <?php echo $model->getNamespace();?>.controllers;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.stereotype.Controller;
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
@Controller
@RequestMapping("<?php echo $model->getRequestPath();?>")
class <?php echo $model->getClassName();?><?php if($model->getBaseClass()):?> : <?php echo $model->getBaseClass();?>()<?php endif;>

//TODO:

}
