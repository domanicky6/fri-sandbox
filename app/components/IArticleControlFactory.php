<?php

namespace App\Components;

use DibiRow;

interface IArticleControlFactory
{
	/**
	 * @return ArticleControl
	 */
	public function create(DibiRow $article);
}