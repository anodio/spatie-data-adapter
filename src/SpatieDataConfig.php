<?php

namespace Anodio\SpatieDataAdapter;

use Anodio\Core\AttributeInterfaces\AbstractConfig;
use Anodio\Core\Attributes\Config;
use BackedEnum;
use DateTimeInterface;


#[Config('data')]
class SpatieDataConfig extends AbstractConfig
{
    public $date_format = DATE_ATOM;

    public $transformers = [
        DateTimeInterface::class => \Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer::class,
        \Illuminate\Contracts\Support\Arrayable::class => \Spatie\LaravelData\Transformers\ArrayableTransformer::class,
        BackedEnum::class => \Spatie\LaravelData\Transformers\EnumTransformer::class,
    ];

    public $casts = [
        DateTimeInterface::class => \Spatie\LaravelData\Casts\DateTimeInterfaceCast::class,
        BackedEnum::class => \Spatie\LaravelData\Casts\EnumCast::class,
    ];

    public $rule_inferrers = [
        \Spatie\LaravelData\RuleInferrers\SometimesRuleInferrer::class,
        \Spatie\LaravelData\RuleInferrers\NullableRuleInferrer::class,
        \Spatie\LaravelData\RuleInferrers\RequiredRuleInferrer::class,
        \Spatie\LaravelData\RuleInferrers\BuiltInTypesRuleInferrer::class,
        \Spatie\LaravelData\RuleInferrers\AttributesRuleInferrer::class,
    ];

    public $normalizers = [
        \Spatie\LaravelData\Normalizers\ModelNormalizer::class,
        // \Spatie\LaravelData\Normalizers\FormRequestNormalizer::class,
        \Spatie\LaravelData\Normalizers\ArrayableNormalizer::class,
        \Spatie\LaravelData\Normalizers\ObjectNormalizer::class,
        \Spatie\LaravelData\Normalizers\ArrayNormalizer::class,
        \Spatie\LaravelData\Normalizers\JsonNormalizer::class,
    ];

    public $wrap = null;

    public $var_dumper_caster_mode = 'development';

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->structure_caching = [
            'enabled' => false,
        ];
    }

    public $structure_caching;

    public $validation_strategy = \Spatie\LaravelData\Support\Creation\ValidationStrategy::OnlyRequests->value;


    public $ignore_invalid_partials = false;

    public $throw_when_max_transformation_depth_reached = false;

}