<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/monitoring/v3/uptime.proto

namespace Google\Cloud\Monitoring\V3;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Information required for a TCP uptime check request.
 *
 * Generated from protobuf message <code>google.monitoring.v3.UptimeCheckConfig.TcpCheck</code>
 */
class UptimeCheckConfig_TcpCheck extends \Google\Protobuf\Internal\Message
{
    /**
     * The port to the page to run the check against. Will be combined with host
     * (specified within the MonitoredResource) to construct the full URL.
     * Required.
     *
     * Generated from protobuf field <code>int32 port = 1;</code>
     */
    private $port = 0;

    public function __construct() {
        \GPBMetadata\Google\Monitoring\V3\Uptime::initOnce();
        parent::__construct();
    }

    /**
     * The port to the page to run the check against. Will be combined with host
     * (specified within the MonitoredResource) to construct the full URL.
     * Required.
     *
     * Generated from protobuf field <code>int32 port = 1;</code>
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * The port to the page to run the check against. Will be combined with host
     * (specified within the MonitoredResource) to construct the full URL.
     * Required.
     *
     * Generated from protobuf field <code>int32 port = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setPort($var)
    {
        GPBUtil::checkInt32($var);
        $this->port = $var;

        return $this;
    }

}

