<?php

declare(strict_types=1);

namespace Bavix\Wallet\Test;

use Bavix\Wallet\Internal\MathInterface;
use Bavix\Wallet\Objects\Cart;
use Bavix\Wallet\Services\CommonService;
use Bavix\Wallet\Services\DbService;
use Bavix\Wallet\Services\LockService;
use Bavix\Wallet\Services\WalletService;
use Bavix\Wallet\Test\Common\Models\Transaction;
use Bavix\Wallet\Test\Common\Models\Transfer;
use Bavix\Wallet\Test\Common\Models\Wallet;

/**
 * @internal
 */
class SingletonTest extends TestCase
{
    public function testCart(): void
    {
        self::assertNotSame($this->getRefId(Cart::class), $this->getRefId(Cart::class));
    }

    public function testMathInterface(): void
    {
        self::assertSame($this->getRefId(MathInterface::class), $this->getRefId(MathInterface::class));
    }

    public function testTransaction(): void
    {
        self::assertNotSame($this->getRefId(Transaction::class), $this->getRefId(Transaction::class));
    }

    public function testTransfer(): void
    {
        self::assertNotSame($this->getRefId(Transfer::class), $this->getRefId(Transfer::class));
    }

    public function testWallet(): void
    {
        self::assertNotSame($this->getRefId(Wallet::class), $this->getRefId(Wallet::class));
    }

    public function testCommonService(): void
    {
        self::assertSame($this->getRefId(CommonService::class), $this->getRefId(CommonService::class));
    }

    public function testWalletService(): void
    {
        self::assertSame($this->getRefId(WalletService::class), $this->getRefId(WalletService::class));
    }

    public function testDbService(): void
    {
        self::assertSame($this->getRefId(DbService::class), $this->getRefId(DbService::class));
    }

    public function testLockService(): void
    {
        self::assertSame($this->getRefId(LockService::class), $this->getRefId(LockService::class));
    }

    protected function getRefId(string $object): string
    {
        return spl_object_hash(app($object));
    }
}
