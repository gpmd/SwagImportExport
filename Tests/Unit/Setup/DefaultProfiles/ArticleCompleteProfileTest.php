<?php
/**
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SwagImportExport\Tests\Unit\Setup\DefaultProfiles;

use Shopware\Setup\SwagImportExport\DefaultProfiles\ArticleCompleteProfile;
use Shopware\Setup\SwagImportExport\DefaultProfiles\ProfileMetaData;

class ArticleCompleteProfileTest extends \PHPUnit_Framework_TestCase
{
    use DefaultProfileTestCaseTrait;

    /**
     * @return ArticleCompleteProfile
     */
    private function createArticleAllProfile()
    {
        return new ArticleCompleteProfile();
    }

    public function test_it_can_be_created()
    {
        $articleProfile = new ArticleCompleteProfile();

        $this->assertInstanceOf(ArticleCompleteProfile::class, $articleProfile);
        $this->assertInstanceOf(ProfileMetaData::class, $articleProfile);
        $this->assertInstanceOf(\JsonSerializable::class, $articleProfile);
    }

    public function test_it_should_return_valid_profile_tree()
    {
        $articleAllProfile = $this->createArticleAllProfile();

        $this->walkRecursive($articleAllProfile->jsonSerialize(), function ($node) {
            $this->assertArrayHasKey('id', $node, 'Current array: ' . print_r($node, true));
            $this->assertArrayHasKey('name', $node, 'Current array: ' . print_r($node, true));
            $this->assertArrayHasKey('type', $node, 'Current array: ' . print_r($node, true));
        });
    }
}
