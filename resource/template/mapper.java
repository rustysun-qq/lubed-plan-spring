package <?php echo $model->getNamespace();?>.mappers;

import ${package.Entity}.${entity};
import ${superMapperClassPackage};
#if(${mapperAnnotationClass})
import ${mapperAnnotationClass.name};
#end

/**
 * <p>
 * $!{table.comment} Mapper 接口
 * </p>
 *
 * @author ${author}
 * @since ${date}
 */
#if(${mapperAnnotationClass})
@${mapperAnnotationClass.simpleName}
#end
public interface ${table.mapperName} extends ${superMapperClass}<${entity}> {

}
