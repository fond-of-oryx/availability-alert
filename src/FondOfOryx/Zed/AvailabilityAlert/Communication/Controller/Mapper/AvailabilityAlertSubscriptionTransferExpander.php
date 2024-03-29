<?php

namespace FondOfOryx\Zed\AvailabilityAlert\Communication\Controller\Mapper;

use Generated\Shared\Transfer\AvailabilityAlertSubscriptionRequestTransfer;
use Generated\Shared\Transfer\AvailabilityAlertSubscriptionTransfer;

class AvailabilityAlertSubscriptionTransferExpander implements AvailabilityAlertSubscriptionTransferExpanderInterface
{
    /**
     * @var array<\FondOfOryx\Zed\AvailabilityAlertExtension\Dependency\Plugin\Expander\AvailabilityAlertSubscriptionTransferExpanderPluginInterface>
     */
    protected $expanderPlugins;

    /**
     * @param array<\FondOfOryx\Zed\AvailabilityAlertExtension\Dependency\Plugin\Expander\AvailabilityAlertSubscriptionTransferExpanderPluginInterface> $expanderPlugins
     */
    public function __construct(array $expanderPlugins)
    {
        $this->expanderPlugins = $expanderPlugins;
    }

    /**
     * @param \Generated\Shared\Transfer\AvailabilityAlertSubscriptionTransfer $availabilityAlertSubscriptionTransfer
     * @param \Generated\Shared\Transfer\AvailabilityAlertSubscriptionRequestTransfer $alertSubscriptionRequestTransfer
     *
     * @return \Generated\Shared\Transfer\AvailabilityAlertSubscriptionTransfer
     */
    public function expandWithSubscriptionRequest(
        AvailabilityAlertSubscriptionTransfer $availabilityAlertSubscriptionTransfer,
        AvailabilityAlertSubscriptionRequestTransfer $alertSubscriptionRequestTransfer
    ): AvailabilityAlertSubscriptionTransfer {
        foreach ($this->expanderPlugins as $plugin) {
            $availabilityAlertSubscriptionTransfer = $plugin->expand(
                $availabilityAlertSubscriptionTransfer,
                $alertSubscriptionRequestTransfer,
            );
        }

        return $availabilityAlertSubscriptionTransfer;
    }
}
