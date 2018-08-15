<?php

namespace Heptacom\Shopware\Util\Components\Updater;

use Doctrine\ORM\OptimisticLockException;
use Heptacom\Shopware\Util\ContainerAwares\HasModelManager;
use Shopware\Models\Mail\Mail;

/**
 * Trait UpdatesEmailTemplates
 */
trait UpdatesEmailTemplates
{
    use HasModelManager;

    /**
     * @param string[] $templateNames
     *
     * @throws OptimisticLockException
     *
     * @return Mail[]
     */
    public function updateMailTemplates(array $templateNames)
    {
        return array_map([$this, 'updateMailTemplate'], $templateNames);
    }

    /**
     * @param string $templateName
     *
     * @throws OptimisticLockException
     *
     * @return Mail
     */
    public function updateMailTemplate($templateName)
    {
        /** @var Mail $mailTemplate */
        $mailTemplate = $this->getModelManager()->getRepository(Mail::class)->findOneBy(['name' => $templateName]);
        if (!$mailTemplate instanceof Mail) {
            $mailTemplate = new Mail();
        }

        $mailTemplate->fromArray($templateName);

        $this->getModelManager()->persist($mailTemplate);
        $this->getModelManager()->flush($mailTemplate);

        return $mailTemplate;
    }

    /**
     * @param string $templateName
     *
     * @return array
     */
    public function generateMailTemplateData($templateName)
    {
        return [
            'name' => $templateName,
            'fromMail' => '{config name=mail}',
            'fromName' => '{config name=shopName}',
            'subject' => '{include file="email/' . $templateName . '.subject.tpl"}',
            'content' => '{include file="email/' . $templateName . '.text.tpl"}',
            'contentHtml' => '{include file="email/' . $templateName . '.html.tpl"}',
            'isHtml' => true,
        ];
    }
}
