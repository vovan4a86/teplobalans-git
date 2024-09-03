<?php namespace App\Traits;

use Fanky\Admin\Models\Product;
use OpenGraph;


trait OgGenerate{
	public function ogGenerate() {

		OpenGraph::setUrl($this->url);
		if($this->og_title || $this->title){
			OpenGraph::setTitle($this->og_title ?: $this->title);
		}
		if($this->og_description || $this->description){
			OpenGraph::setDescription($this->og_description ?: $this->description);
		}
        if($this->image) {
            OpenGraph::addImage($this->image_src);
        } else {
            OpenGraph::addImage('/static/images/favicon/apple-touch-icon.png');
        }
	}
}
