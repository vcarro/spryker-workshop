<?php

namespace Pyz\Zed\Antelope\Communication\Controller;

use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Antelope\Communication\Form\DataProvider\AntelopeFormDataProvider;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Antelope\Business\AntelopeFacadeInterface getFacade()
 * @method \Pyz\Zed\Antelope\Communication\AntelopeCommunicationFactory getFactory()
 * @method \Pyz\Zed\Antelope\Persistence\AntelopeRepositoryInterface getRepository()
 * @method \Pyz\Zed\Antelope\Persistence\AntelopeQueryContainerInterface getQueryContainer()
 */
class EditController extends AbstractController
{
    public const PARAM_ID_ANTELOPE = 'id-antelope';

    private const PARAM_REDIRECT_URL = 'redirect-url';
    private const MESSAGE_ANTELOPE_NOT_FOUND = 'Antelope not found';
    private const URL_REDIRECT_ANTELOPE_PAGE = '/antelope';
    private const MESSAGE_SUCCESS_ANTILOPE_UPDATE = 'Antelope has been updated';

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $idAntelope = $request->get(static::PARAM_ID_ANTELOPE);

        if (empty($idAntelope)) {
            return $this->redirectResponse(static::URL_REDIRECT_ANTELOPE_PAGE);
        }

        $dataProvider = $this->getFactory()->createAntelopeFormDataProvider();
        $idAntelope = $this->castId($idAntelope);
        $antelopeTransfer = $dataProvider->getData($idAntelope);

        if (!$antelopeTransfer->getIdAntelope()) {
            $this->addErrorMessage(static::MESSAGE_ANTELOPE_NOT_FOUND);

            return $this->redirectResponse(static::URL_REDIRECT_ANTELOPE_PAGE );
        }

        $antelopeForm = $this->getFactory()
            ->getAntelopeEditForm(
                $antelopeTransfer,
                $dataProvider->getOptions()
            )
            ->handleRequest($request);

        if ($antelopeForm->isSubmitted() && $antelopeForm->isValid()) {
            return $this->updateAntelope(
                $antelopeForm,
                $request->query->get(static::PARAM_REDIRECT_URL, static::URL_REDIRECT_ANTELOPE_PAGE)
            );
        }

        return $this->viewResponse([
            'form' => $antelopeForm->createView(),
            'idAntelope' => $idAntelope,
        ]);
    }

    /**
     * @param \Symfony\Component\Form\FormInterface $antelopeForm
     * @param string $redirectUrl
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function updateAntelope(FormInterface $antelopeForm, string $redirectUrl)
    {
        /** @var \Generated\Shared\Transfer\AntelopeTransfer $antelopeTransfer */
        $antelopeTransfer = $antelopeForm->getData();
        $antelopeResponseTransfer = $this->getFactory()
            ->getAntelopeFacade()
            ->update($antelopeTransfer);

        if (!$antelopeResponseTransfer->getIsSuccessful()) {
            foreach ($antelopeResponseTransfer->getMessages() as $message) {
                $this->addErrorMessage($message->getText());
            }

            return $this->viewResponse([
                'form' => $antelopeForm->createView(),
                'idAntelope' => $antelopeTransfer->getIdAntelope(),
            ]);
        }

        foreach ($antelopeResponseTransfer->getMessages() as $message) {
            $this->addSuccessMessage($message->getText());
        }

        $this->addSuccessMessage(static::MESSAGE_SUCCESS_ANTILOPE_UPDATE);

        return $this->redirectResponse($redirectUrl);
    }
}
