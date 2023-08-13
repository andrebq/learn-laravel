<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use League\CommonMark\CommonMarkConverter;

class Bookmark
{
    public $title;
    public $slug;
    public $last_update;
    public $endpoint;
    public $tags;
    public $body;

    public function __construct($title, $slug, $last_update, $endpoint, $body, $tags)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->last_update = $last_update;
        $this->endpoint = $endpoint;
        $this->body = $body;
        $this->tags = $tags;
    }

    public function body_as_safe_html() {
        return (new CommonMarkConverter(['html_input' => 'strip']))->convert($this->body);
    }

    static function mostRelevant() {
        // not even a function to join paths.....
        $items = File::allFiles(base_path() . '/resources/bookmarks');
        return collect($items)
            ->filter(fn($item) => $item->getExtension() == 'md' )
            ->map(fn($file) => YamlFrontMatter::parse($file->getContents()))
            ->map(fn($doc) => new Bookmark(
                $doc->title,
                $doc->slug,
                $doc->last_update,
                $doc->endpoint,
                $doc->body(),
                Tag::to_tag_list($doc->tags)
            ))
            ;
    }
/// Example of a bookarmk Yaml Front Matter
/*
---
slug: laravel-from-scratch
title: Laracasts - Laravel 8 from scratch
last-update: 2023-08-13
endpoint: https://laracasts.com/series/laravel-8-from-scratch
tags:
  framework: laravel
  language: php
  domain: laracasts.com
---
*/
}

?>