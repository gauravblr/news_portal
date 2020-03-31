<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_FactCheckTools_GoogleFactcheckingFactchecktoolsV1alpha1ClaimReview extends Google_Model
{
  public $languageCode;
  protected $publisherType = 'Google_Service_FactCheckTools_GoogleFactcheckingFactchecktoolsV1alpha1Publisher';
  protected $publisherDataType = '';
  public $reviewDate;
  public $textualRating;
  public $title;
  public $url;

  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param Google_Service_FactCheckTools_GoogleFactcheckingFactchecktoolsV1alpha1Publisher
   */
  public function setPublisher(Google_Service_FactCheckTools_GoogleFactcheckingFactchecktoolsV1alpha1Publisher $publisher)
  {
    $this->publisher = $publisher;
  }
  /**
   * @return Google_Service_FactCheckTools_GoogleFactcheckingFactchecktoolsV1alpha1Publisher
   */
  public function getPublisher()
  {
    return $this->publisher;
  }
  public function setReviewDate($reviewDate)
  {
    $this->reviewDate = $reviewDate;
  }
  public function getReviewDate()
  {
    return $this->reviewDate;
  }
  public function setTextualRating($textualRating)
  {
    $this->textualRating = $textualRating;
  }
  public function getTextualRating()
  {
    return $this->textualRating;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}
