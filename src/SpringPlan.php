<?php

namespace Lubed\Spring;

use Lubed\Models\DefaultGeneratePlanModel;
use Lubed\Data\DataSource;
use Lubed\Data\MySQLDataSource;
use Lubed\GeneratePlan;
use Lubed\Utils\Config;
use Lubed\Utils\Constant;
use Lubed\Utils\Path;
use Lubed\Utils\Registry;

/**
 * Class SpringPlan
 *
 * @package Lubed\Spring
 */
class SpringPlan implements GeneratePlan
{
    /**
     * @var Config
     */
    private $config;
    /**
     * @var DataSource $data_source
     */
    protected $data_source_name;
    protected $templates;
    protected $model;
    private $path;

    /**
     * GenerateService constructor.
     *
     * @param string $data_source_name
     */
    public function __construct(string $data_source_name)
    {
        $package_path = dirname(__DIR__);
        $this->path = Path::getInstance($package_path);
        $this->initConfig();
        $this->data_source_name = $data_source_name;
    }

    private function initConfig()
    {
        $this->config = new Config(sprintf('config.%s', 'default'), $this->path);
    }

    /**
     * @param string $outputDir
     *
     * @return $this
     */
    public function doPlan(string $outputDir = ''): SpringPlan
    {
        //获取plan配置
        $rootPath = $this->path->getRootPath();
        $planName = $this->config->get('plan');
        $planTemplate = $planName;
        //输出
        $output_path = sprintf($this->config->get('outputPath'), $rootPath, $outputDir);
        $dataSource = $this->initDataSource();

        $generate_plan_model = new DefaultGeneratePlanModel(
            $planTemplate, $dataSource->getTablesData(), $this->config->get('generator'), $this->path->getResourcePath()
        );
        $generate_plan_model->build()->output($output_path);
        die('ook');

        return $this;
    }

    protected function initDataSource(): DataSource
    {
        $registry = Registry::getInstance();
        $db_config = $registry->get(Constant::DB_CONFIG_KEY);
        $connections = $db_config->get('connections');
        $db_config = $connections->get($this->data_source_name);
        $dataSourceClass = $this->config->get('dataSourceClass');
        if ($dataSourceClass) {
            return (new $dataSourceClass($db_config));
        }
        return (new MySQLDataSource($connections));
    }
}