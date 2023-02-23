<?php
namespace Lubed\Spring;

use Lubed\Models\DefaultGeneratePlanModel;
use Lubed\Utils\Config;
use Lubed\Utils\Constant;
use Lubed\Utils\Path;
use Lubed\Utils\Registry;

/**
 * Class SpringPlanGenerateService
 *
 * @package Lubed\Services
 */
class SpringPlanGenerateService
{
    /**
     * @var Config
     */
    private $config;
    protected $data_source;
    protected $templates;
    protected $model;
    private $path;

    /**
     * GenerateService constructor.
     *
     * @param \Lubed\Utils\Config $config
     * @param Path $path
     */
    public function __construct($config, Path $path)
    {
        $this->config = $config;
        $this->path = $path;
    }

    /**
     * @param string $outputDir
     * @param string $dataSourceName
     *
     * @return $this
     */
    public function doPlan(string $outputDir = '', string $dataSourceName = '')
    {
        //获取plan配置
        $plan_config = $this->config;
        $rootPath = $this->path->getRootPath();
        $planName = $plan_config->get('plan');
        $framework = $plan_config->get('framework');
        $planTemplate = $planName;
        if ($framework) {
            $planTemplate = str_replace('.', '/', $framework.'/'.$planName);
        }
        //获取数据源名称
        $data_source_name = $dataSourceName ?: $plan_config->get('dataSource');
        //输出
        $output_path = sprintf($plan_config->get('outputPath'), $rootPath, $outputDir);
        echo "\noutputPath=", $output_path;
        $registry = Registry::getInstance();
        $db_config = $registry->get(Constant::DB_CONFIG_KEY);
        $connections = $db_config->get('connections');
        $dataSource = $this->bindDataSource($data_source_name, $connections);
        $generate_plan_model = new DefaultGeneratePlanModel(
            $planTemplate, $dataSource, $plan_config->get('generator'), $this->path->getResourcePath()
        );
        $generate_plan_model->build()->output($output_path);

        return $this;
    }


    /**
     * @param string $planName
     *
     * @return string
     */
    private function getTemplatePath(string $planName) : string
    {
        return vsprintf('%splan/%s/template/', [$this->path->getResourcePath(), $planName]);
    }
}