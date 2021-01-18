<?php

namespace LitShop\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ConstantCodeGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'codegen:const';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '根据模板生成常量定义（模拟枚举）';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \JsonException
     */
    public function handle()
    {
        $files = scandir(resource_path('codetpl/constants/'));
        foreach ($files as $file) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }

            $content = json_decode(file_get_contents(resource_path('codetpl/constants/' . $file)), true, 512, JSON_THROW_ON_ERROR);
            $f = data_get($content, 'fileName');
            $namespace = data_get($content, 'namespace');
            $path = trim(str_replace('LitShop', '', $namespace), '\\');
            $path = app_path(str_replace('\\', '/', $path)).'/';
            if (!file_exists($path) && !mkdir($path, 0777, 1) && !is_dir($path)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $path));
            }

            $f = $path.$f;

            $class = "<?php \n";
            $class .= sprintf("namespace %s;\n\n", $namespace);
            $class .= '//'. data_get($content, 'class_doc') ."\n";
            $class .= sprintf("class %s {\n", basename($f, '.php'));

            $constDefines = data_get($content, 'constants');
            foreach ($constDefines as $item) {
                $class .= sprintf("\t// %s\n", $item[2]);
                $class .= sprintf("\tpublic const %s = %s;\n", Str::upper($item[0]), $item[1]);
                $class .= "\n";
            }

            $class .= "\n";
            foreach ($constDefines as $item) {
                $class .= sprintf("\t// %s\n", $item[2]);
                $class .= sprintf("\tpublic const %s_TITLE = '%s';\n", Str::upper($item[0]), $item[2]);
                $class .= "\n";
            }

            $class .= "\n";
            $class .= sprintf("\tpublic const defines = [\n");
            foreach ($constDefines as $item) {
                $class .= sprintf("\t\t['%s', %s, '%s'],\n", $item[0], $item[1], $item[2]);
            }
            $class .= "\t];\n\n";

            foreach ($constDefines as $item) {
                $class .= sprintf("\tpublic static function %sTitle(): string {\n", Str::camel($item[0]));
                $class .= sprintf("\t\treturn self::%s_TITLE;\n", Str::upper($item[0]));
                $class .= "\t}\n\n";
            }

            $class .= sprintf("\tpublic static function titleByValue(\$value) {\n");
            $class .= "\t\treturn collect(self::defines)->keyBy('1')->get(\$value)[2];\n";
            $class .= "\t}\n\n";


            $class .= "\tpublic static function titleByName(\$name) {\n";
            $class .= "\t\treturn collect(self::defines)->keyBy('0')->get(\$name)[2];\n";
            $class .= "\t}\n\n";


            $class .= "\tpublic static function names() {\n";
            $class .= "\t\treturn collect(self::defines)->pluck('0')->toArray();\n";
            $class .= "\t}\n\n";


            $class .= "\tpublic static function titles() {\n";
            $class .= "\t\treturn collect(self::defines)->pluck('2')->toArray();\n";
            $class .= "\t}\n\n";


            $class .='}';

            file_put_contents($f, $class);
        }

        $this->info('done!');
        return 0;
    }
}

