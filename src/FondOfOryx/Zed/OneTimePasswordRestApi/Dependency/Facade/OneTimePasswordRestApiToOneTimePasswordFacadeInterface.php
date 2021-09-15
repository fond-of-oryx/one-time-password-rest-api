<?php

namespace FondOfOryx\Zed\OneTimePasswordRestApi\Dependency\Facade;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\OneTimePasswordResponseTransfer;
use Generated\Shared\Transfer\OrderTransfer;

interface OneTimePasswordRestApiToOneTimePasswordFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\OneTimePasswordResponseTransfer
     */
    public function requestOneTimePassword(CustomerTransfer $customerTransfer): OneTimePasswordResponseTransfer;

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\OneTimePasswordResponseTransfer
     */
    public function requestLoginLink(CustomerTransfer $customerTransfer): OneTimePasswordResponseTransfer;

    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return \Generated\Shared\Transfer\OneTimePasswordResponseTransfer
     */
    public function requestLoginLinkWithOrderReference(OrderTransfer $orderTransfer): OneTimePasswordResponseTransfer;
}
