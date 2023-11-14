<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Article\ArticlePreviewRequest;
use App\Http\Responders\Article\ArticlePreviewResponder;
use App\UseCases\Article\ArticlePreviewUseCase;

class ArticleController extends Controller
{
    public function preview(int $articleId, ArticlePreviewRequest $request, ArticlePreviewUseCase $useCase, ArticlePreviewResponder $responder)
    {
        $params = $request->safe();

        $dto = $useCase->invoke($articleId, (int) ($params->page ?? 1));

        return $responder->invoke($dto);
    }
}
