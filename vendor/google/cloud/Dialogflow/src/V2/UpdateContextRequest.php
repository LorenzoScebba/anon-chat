<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dialogflow/v2/context.proto

namespace Google\Cloud\Dialogflow\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The request message for [Contexts.UpdateContext][google.cloud.dialogflow.v2.Contexts.UpdateContext].
 *
 * Generated from protobuf message <code>google.cloud.dialogflow.v2.UpdateContextRequest</code>
 */
class UpdateContextRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The context to update.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.Context context = 1;</code>
     */
    private $context = null;
    /**
     * Optional. The mask to control which fields get updated.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2;</code>
     */
    private $update_mask = null;

    public function __construct() {
        \GPBMetadata\Google\Cloud\Dialogflow\V2\Context::initOnce();
        parent::__construct();
    }

    /**
     * Required. The context to update.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.Context context = 1;</code>
     * @return \Google\Cloud\Dialogflow\V2\Context
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Required. The context to update.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.Context context = 1;</code>
     * @param \Google\Cloud\Dialogflow\V2\Context $var
     * @return $this
     */
    public function setContext($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dialogflow\V2\Context::class);
        $this->context = $var;

        return $this;
    }

    /**
     * Optional. The mask to control which fields get updated.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2;</code>
     * @return \Google\Protobuf\FieldMask
     */
    public function getUpdateMask()
    {
        return $this->update_mask;
    }

    /**
     * Optional. The mask to control which fields get updated.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2;</code>
     * @param \Google\Protobuf\FieldMask $var
     * @return $this
     */
    public function setUpdateMask($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\FieldMask::class);
        $this->update_mask = $var;

        return $this;
    }

}

