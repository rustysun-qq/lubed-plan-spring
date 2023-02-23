package ${package.ServiceImpl};

import ${package.Entity}.${entity};
import ${package.Mapper}.${table.mapperName};
#if(${table.serviceInterface})
import ${package.Service}.${table.serviceName};
#end
import ${superServiceImplClassPackage};
import org.springframework.stereotype.Service;

/**
 * <p>
 * $!{table.comment} 服务实现类
 * </p>
 *
 * @author ${author}
 * @since ${date}
 */
@Service
open class ${table.serviceImplName} : ${superServiceImplClass}<${table.mapperName}, ${entity}>()#if(${table.serviceInterface}), ${table.serviceName}#end {

}

