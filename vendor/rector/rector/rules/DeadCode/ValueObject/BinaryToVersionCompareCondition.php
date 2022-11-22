<?php

declare (strict_types=1);
namespace Rector\DeadCode\ValueObject;

use Rector\DeadCode\Contract\ConditionInterface;
final class BinaryToVersionCompareCondition implements ConditionInterface
{
    /**
     * @readonly
     * @var \Rector\DeadCode\ValueObject\VersionCompareCondition
     */
    private $versionCompareCondition;
    /**
     * @var class-string
     * @readonly
     */
    private $binaryClass;
    /**
     * @readonly
     * @var mixed
     */
    private $expectedValue;
    /**
     * @param class-string $binaryClass
     * @param mixed $expectedValue
     */
    public function __construct(\Rector\DeadCode\ValueObject\VersionCompareCondition $versionCompareCondition, string $binaryClass, $expectedValue)
    {
        $this->versionCompareCondition = $versionCompareCondition;
        $this->binaryClass = $binaryClass;
        $this->expectedValue = $expectedValue;
    }
    public function getVersionCompareCondition() : \Rector\DeadCode\ValueObject\VersionCompareCondition
    {
        return $this->versionCompareCondition;
    }
    public function getBinaryClass() : string
    {
        return $this->binaryClass;
    }
    /**
     * @return mixed
     */
    public function getExpectedValue()
    {
        return $this->expectedValue;
    }
}
